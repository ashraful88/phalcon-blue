CREATE OR REPLACE FUNCTION user_delete(i_user_id user_accounts.user_id%TYPE)
  RETURNS BOOLEAN AS $$
BEGIN

  IF i_user_id IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  IF (NOT EXISTS(SELECT 1
                 FROM user_accounts
                 WHERE user_id = i_user_id))
  THEN
    RAISE EXCEPTION '%', 'Blue:POST_NOT_FOUND:Blue';
  END IF;

  DELETE FROM user_accounts
  WHERE user_id = i_user_id;


  IF FOUND
  THEN
    RETURN TRUE;
  ELSE
    RETURN FALSE;
  END IF;


END;
$$ LANGUAGE plpgsql;