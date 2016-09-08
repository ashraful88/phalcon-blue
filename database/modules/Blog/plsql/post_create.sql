CREATE OR REPLACE FUNCTION post_create(i_title   blog_posts.title%TYPE,
                                       i_body    blog_posts.body%TYPE,
                                       i_params  blog_posts.params%TYPE,
                                       i_status  blog_posts.status%TYPE,
                                       i_user_id user_accounts.user_id%TYPE,
  OUT                                  o_post_id blog_posts.post_id%TYPE) AS $$
DECLARE
  l_categories JSON;
  l_tags       JSON;
BEGIN

  IF i_title IS NULL OR i_body IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  INSERT INTO blog_posts (title, body, params, status, user_id)
  VALUES (i_title, i_body, i_params, i_status, i_user_id)
  RETURNING post_id
    INTO o_post_id;

  l_categories     := i_params :: JSON ->> 'categories';
  l_tags           := i_params :: JSON ->> 'tags';

  --insert category map
  INSERT INTO blog_post_categories (category_id, post_id)
    SELECT
      cat_id,
      o_post_id postid
    FROM json_array_elements_text(l_categories) cat_id;

  --insert tag map
  INSERT INTO blog_post_tags (tag_id, post_id)
    SELECT
      tag_id,
      o_post_id postid
    FROM json_array_elements_text(l_tags) tag_id;


END;
$$ LANGUAGE plpgsql;