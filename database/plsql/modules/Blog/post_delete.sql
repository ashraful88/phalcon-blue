CREATE OR REPLACE FUNCTION post_delete(i_post_id blog_posts.post_is%TYPE)
  RETURNS BOOLEAN AS $$
BEGIN

  IF i_post_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  IF (NOT EXISTS(SELECT 1
                 FROM blog_posts
                 WHERE post_id = i_post_id))
  THEN
    RAISE EXCEPTION '%', 'Blue:POST_NOT_FOUND:Blue';
  END IF;

  DELETE FROM blog_posts
  WHERE post_id = i_post_id;


  IF FOUND
  THEN
    RETURN TRUE;
  ELSE
    RETURN FALSE;
  END IF;


END;
$$ LANGUAGE plpgsql;