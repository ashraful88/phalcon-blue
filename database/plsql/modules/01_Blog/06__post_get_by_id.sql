CREATE OR REPLACE FUNCTION post_read(i_post_id blog_posts.post_id%TYPE)
  RETURNS SETOF blog_posts AS $$
BEGIN

  RETURN QUERY SELECT *
               FROM blog_posts
               WHERE post_id = i_post_id;

  IF NOT FOUND
  THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;

END;
$$ LANGUAGE plpgsql;
