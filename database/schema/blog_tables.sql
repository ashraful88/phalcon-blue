CREATE TABLE blog_posts (
  post_id BIGSERIAL UNIQUE PRIMARY KEY,
  title TEXT NOT NULL,
  body TEXT NOT NULL,
  params JSONB,
  status INT NOT NULL,
  create_time TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP,
  publish_time TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- blog tags
CREATE TABLE blog_tags (
  tag_id BIGSERIAL UNIQUE PRIMARY KEY,
  name TEXT NOT NULL,
  status INT NOT NULL,
  create_time TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- blog post tags
CREATE TABLE blog_post_tags (
  post_tag_id BIGSERIAL UNIQUE PRIMARY KEY,
  tag_id BIGSERIAL NOT NULL REFERENCES blog_tags(tag_id),
  post_id BIGSERIAL NOT NULL REFERENCES blog_posts (post_id) ON UPDATE CASCADE,
);

-- blog post category
CREATE TABLE blog_post_categories (
  post_category_id BIGSERIAL UNIQUE PRIMARY KEY,
  category_id BIGSERIAL NOT NULL REFERENCES categories(category_id),
  post_id BIGSERIAL NOT NULL REFERENCES blog_posts (post_id) ON UPDATE CASCADE,
);