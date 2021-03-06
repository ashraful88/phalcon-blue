CREATE TABLE user_accounts (
  user_id UUID UNIQUE PRIMARY KEY,
  name TEXT NOT NULL,
  email TEXT NOT NULL,
  phone TEXT NOT NULL,
  password TEXT NOT NULL,
  params JSONB,
  status INT NOT NULL,
  create_time TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
);

GRANT SELECT, INSERT, DELETE, UPDATE ON user_accounts to bluewriterole;
GRANT SELECT ON user_accounts to bluereadrole;
