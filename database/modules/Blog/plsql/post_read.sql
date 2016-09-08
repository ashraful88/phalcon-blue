CREATE OR REPLACE FUNCTION post_read(i_limit  INT,
                                     i_offset INT)
  RETURNS SETOF blog_posts AS $$
BEGIN

  RETURN QUERY SELECT *
               FROM blog_posts
               LIMIT i_limit
               OFFSET i_offset;

  IF NOT FOUND
  THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;

END;
$$ LANGUAGE plpgsql;