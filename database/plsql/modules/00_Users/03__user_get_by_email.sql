CREATE OR REPLACE FUNCTION user_get_by_email(i_email user_accounts.email%TYPE)
  RETURNS SETOF user_accounts AS $$
BEGIN

  IF i_user_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  RETURN QUERY SELECT *
               FROM user_accounts
               WHERE email = i_email;

  IF NOT FOUND
  THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;

END;
$$ LANGUAGE plpgsql;
