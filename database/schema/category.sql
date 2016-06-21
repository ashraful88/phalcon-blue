--table for all types of categories
CREATE TABLE categories (
  category_id smallserial UNIQUE PRIMARY KEY,
  name TEXT NOT NULL,
  type category_type_enum NOT NULL DEFAULT 'blog',
  params JSONB,
  status INT NOT NULL,
  create_time TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
);