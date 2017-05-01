UPDATE user
SET password = :password,
full_name = :full_name,
email = :email
WHERE user_id = :id
