CREATE OR REPLACE FUNCTION user_gets(i_status user_accounts.status%TYPE,
                                     i_limit INT,
                                     i_offset INT)
  RETURNS SETOF user_accounts AS $$
BEGIN

  IF i_status IS NULL
  THEN
    RAISE EXCEPTION '%', 'Blue:NULL_DATA:Blue';
  END IF;

  RETURN QUERY SELECT *
               FROM user_accounts
               WHERE status = i_status
               LIMIT i_limit
               OFFSET i_offset;

  IF NOT FOUND
  THEN
    RAISE EXCEPTION '%', 'Blue:NOT_FOUND:Blue';
  END IF;

END;
$$ LANGUAGE plpgsql;
