CREATE OR REPLACE FUNCTION post_get_by_user(i_user_id user_accounts.user_id%TYPE,
                                            i_limit   INT
                                            i_offset   INT)
  RETURNS SETOF blog_posts AS $$
BEGIN

  IF i_user_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  RETURN QUERY SELECT * FROM blog_posts WHERE user_id = i_user_id LIMIT i_limit OFFSET i_offset;

  IF NOT FOUND THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;

END;
$$ LANGUAGE plpgsql;
