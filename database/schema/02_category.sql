--table for all types of categories
CREATE TABLE categories (
  category_id smallserial UNIQUE PRIMARY KEY,
  name TEXT NOT NULL,
  type category_type_enum NOT NULL,
  params JSONB,
  parent_category_id INT NOT NULL DEFAULT 0,
  status INT NOT NULL,
  create_time TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
);
