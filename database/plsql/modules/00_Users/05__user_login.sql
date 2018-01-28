CREATE OR REPLACE FUNCTION user_login(i_username        TEXT,
                                         i_password     user_accounts.password%TYPE,
  OUT                                    o_user_id      user_accounts.user_id%TYPE,
  OUT                                    o_name         user_accounts.name%TYPE,
  OUT                                    o_phone        user_accounts.phone%TYPE,
  OUT                                    o_email        user_accounts.email%TYPE,
  OUT                                    o_status       user_accounts.status%TYPE
) AS $$
BEGIN

  IF i_username IS NULL OR i_password IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NO_DATA:Blue';
  END IF;

WITH
  found_username AS (
  SELECT
            uacc.user_id,
            uacc.name,
            uacc.email,
            uacc.phone,
            uacc.status,
            uacc.password
  FROM
            user_accounts uacc

  WHERE
            uacc.email = i_username OR uacc.phone = i_username
  )
  SELECT
            user_id,
            name,
            phone,
            email,
            status
  INTO
            o_user_id,
            o_name,
            o_phone,
            o_email,
            o_status
  FROM
            found_username facc
  WHERE
            crypt(i_password, facc.password) = facc.password;

  IF o_user_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;
END;
$$ LANGUAGE plpgsql;
