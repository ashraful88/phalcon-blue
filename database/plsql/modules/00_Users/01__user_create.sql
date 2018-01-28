CREATE OR REPLACE FUNCTION user_create(i_name     user_accounts.name%TYPE,
                                       i_email    user_accounts.email%TYPE,
                                       i_phone    user_accounts.phone%TYPE,
                                       i_password user_accounts.password%TYPE,
                                       i_status   user_accounts.status%TYPE,
                                       i_params   user_accounts.params%TYPE,
  OUT                                  o_user_id  user_accounts.user_id%TYPE) AS $$
BEGIN

  IF i_name IS NULL OR i_email IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  IF EXISTS(SELECT 1
            FROM user_accounts
            WHERE phone = i_phone OR email = i_email)
  THEN
    RAISE EXCEPTION '%', 'Blue:USER_ACCOUNT_ALREADY_EXISTS:Blue';
  END IF;

  INSERT INTO user_accounts (user_id, name, email, phone, password, status, params)
  VALUES (uuid_generate_v4(), i_name, i_email, i_phone, crypt(i_password, gen_salt('bf', 8)), i_status, i_params)
  RETURNING user_id
    INTO o_user_id;

END;
$$ LANGUAGE plpgsql;
