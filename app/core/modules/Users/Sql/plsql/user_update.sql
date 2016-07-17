CREATE OR REPLACE FUNCTION user_update(
      i_user_id  user_accounts.user_id%TYPE,
      i_name     user_accounts.name%TYPE,
      i_email    user_accounts.email%TYPE,
      i_password user_accounts.password%TYPE,
      i_params   user_accounts.params%TYPE,
      i_status   user_accounts.status%TYPE,
  OUT o_user_id  user_accounts.user_id%TYPE) AS $$
BEGIN

  IF i_user_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  UPDATE user_accounts
  SET
    name   = i_name,
    email  = i_email,
    param  = i_params,
    status = i_status
  WHERE
    user_id = i_user_id;


END;
$$ LANGUAGE plpgsql;