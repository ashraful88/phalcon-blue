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

  UPDATE blog_posts
  SET
    title   = i_title,
    body    = i_body,
    params = i_params,
    status = i_status
  WHERE
    post_id = i_post_id;

  -- TODO: need to update category and tags

  IF FOUND
  THEN
    RETURN TRUE;
  ELSE
    RETURN FALSE;
  END IF;

END;
$$ LANGUAGE plpgsql;
