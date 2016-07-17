CREATE OR REPLACE FUNCTION user_create(i_name   user_accounts.name%TYPE,
                                       i_email    user_accounts.email%TYPE,
                                       i_password  user_accounts.password%TYPE,
                                       i_status  user_accounts.status%TYPE,
                                       i_param user_accounts.param%TYPE,
  OUT                                  o_user_id user_accounts.user_id%TYPE) AS $$
BEGIN

  IF i_name IS NULL OR i_email IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  INSERT INTO user_accounts (name, email, password, status, param)
  VALUES (i_name, i_email, i_password, i_status, i_param)
  RETURNING user_id
    INTO o_user_id;

END;
$$ LANGUAGE plpgsql;