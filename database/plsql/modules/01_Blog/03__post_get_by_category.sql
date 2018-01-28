CREATE OR REPLACE FUNCTION post_get_by_category(i_category_id categories.category_id%TYPE,
                                                i_limit      INT
                                                i_offset      INT)
  RETURNS SETOF blog_posts AS $$
BEGIN

  IF i_category_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  RETURN QUERY SELECT *
               FROM blog_posts
               JOIN blog_post_categories
               ON blog_post_categories.post_id = blog_posts.post_id
               WHERE blog_post_categories.category_id = i_category_id
               LIMIT i_limit
               OFFSET i_offset;

  IF NOT FOUND
  THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;

END;
$$ LANGUAGE plpgsql;
