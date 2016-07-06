CREATE OR REPLACE FUNCTION post_get_by_category(i_category_id categories.category_id%TYPE,
                                                i_offset      INT)
  RETURNS SETOF blog_posts AS $$
BEGIN

  IF i_category_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  RETURN QUERY SELECT *
               FROM blog_posts
               WHERE category_id = i_category_id
               LIMIT 30
               OFFSET i_offset;

  IF NOT FOUND
  THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;

END;
$$ LANGUAGE plpgsql;