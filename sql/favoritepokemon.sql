IF (SELECT count(*) FROM user join user_favorites on user_id WHERE user_id=:id and pokemon_id=:pokemon_id < 1)
  INSERT INTO user_favorites VALUES (:id, :pokemon_id, 1, NULL)
ELSE
  UPDATE user_favorites SET user_favorites = 1 WHERE user_id = :id AND pokemon_id = :pokemon_id 
