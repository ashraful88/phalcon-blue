CREATE OR REPLACE FUNCTION user_get(i_user_id user_accouts.user_id%TYPE)
  RETURNS SETOF user_accounts AS $$
BEGIN

  IF i_user_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  RETURN QUERY SELECT *
               FROM user_accounts
               WHERE user_id = i_user_id;

  IF NOT FOUND
  THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;

END;
$$ LANGUAGE plpgsql;