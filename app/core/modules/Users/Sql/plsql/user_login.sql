CREATE OR REPLACE FUNCTION user_read(i_email  user_accounts.email%TYPE,
                                     i_password user_accounts.password%TYPE)
  RETURNS SETOF user_accounts AS $$
BEGIN

  RETURN QUERY SELECT *
               FROM user_accounts
               WHERE email = i_email AND crypt(i_password) = password;

  IF NOT FOUND
  THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;

END;
$$ LANGUAGE plpgsql;