SELECT *
FROM user join user_favorites on user_id
WHERE user_id=:id
