class Post < ApplicationRecord
    validates :title, presence: { message: "O post deve conter um título" }
    validates :body, presence: { message: "O conteúdo do post deve conter no mínimo 10 caracteres" }, length: { minimum: 10, message: "O conteúdo do post deve conter no mínimo 10 caracteres" }
end
