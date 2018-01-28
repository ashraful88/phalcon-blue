CREATE OR REPLACE FUNCTION user_update(
      i_user_id  user_accounts.user_id%TYPE,
      i_name     user_accounts.name%TYPE,
      i_email    user_accounts.email%TYPE,
      i_phone    user_accounts.phone%TYPE,
      i_password user_accounts.password%TYPE,
      i_params   user_accounts.params%TYPE,
      i_status   user_accounts.status%TYPE,
  OUT o_user_id  user_accounts.user_id%TYPE) AS $$
DECLARE
  l_user_id    user_accounts.user_id%TYPE;
  l_name       user_accounts.name%TYPE;
  l_email      user_accounts.email%TYPE;
  l_phone      user_accounts.phone%TYPE;
  l_password   user_accounts.password%TYPE;
  l_params     user_accounts.params%TYPE;
  l_status     user_accounts.status%TYPE;
BEGIN

SELECT
    uacc.user_id,
    uacc.phone,
    uacc.email,
    uacc.name,
    uacc.password,
    uacc.status,
    uacc.params
  INTO
    l_user_id, l_phone, l_email, l_name, l_password, l_status, l_params
  FROM
    user_accounts uacc
  WHERE
    uacc.user_id = i_user_id;

  IF l_user_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:USER_NOT_FOUND:Blue';
  END IF;

  IF i_user_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  IF i_name IS NOT NULL
  THEN
    l_name := i_name;
  END IF;
  IF i_email IS NOT NULL
  THEN
    l_params := i_params;
  END IF;
  IF i_params IS NOT NULL
  THEN
    l_params := i_params;
  END IF;
  IF i_params IS NOT NULL
  THEN
    l_params := i_params;
  END IF;
  IF i_params IS NOT NULL
  THEN
    l_params := i_params;
  END IF;

  UPDATE user_accounts
  SET
    name   = i_name,
    email  = i_email,
    phone  = i_phone,
    password  = i_password,
    params = i_params,
    status = i_status
  WHERE
    user_id = i_user_id;

  IF FOUND
  THEN
    RETURN TRUE;
  ELSE
    RETURN FALSE;
  END IF;

END;
$$ LANGUAGE plpgsql;
