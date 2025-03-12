Rails.application.routes.draw do
  resources :atividades, only: [:index, :show]
  root 'atividades#index'

  get "/cadastrar", to: "atividades#new" # Exibe o formulário
  post "/cadastrar", to: "atividades#create" # Envia os dados do formulário
end
