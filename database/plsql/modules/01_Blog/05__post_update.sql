CREATE OR REPLACE FUNCTION post_update(i_post_id blog_posts.post_id%TYPE,
                                       i_title   blog_posts.title%TYPE,
                                       i_body    blog_posts.body%TYPE,
                                       i_params  blog_posts.params%TYPE,
                                       i_status  blog_posts.status%TYPE,
  OUT                                  o_post_id blog_posts.post_id%TYPE) AS $$
DECLARE
  l_categories JSON;
  l_tags       JSON;
BEGIN

  IF i_title IS NULL OR i_body IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;
  -- TODO: edit post cats and tags
  l_categories     := i_params :: JSON ->> 'categories';
  l_tags           := i_params :: JSON ->> 'tags';


END;
$$ LANGUAGE plpgsql;
