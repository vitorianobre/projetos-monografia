class Atividade < ApplicationRecord
    has_one_attached :anexo

    validates :acao_extensao, presence: true
    validates :horas, presence: true, numericality: { only_integer: true, greater_than: 0 }

    before_create :set_data_submissao

    private

    def set_data_submissao
        self.data_submissao ||= Date.today
    end
end
