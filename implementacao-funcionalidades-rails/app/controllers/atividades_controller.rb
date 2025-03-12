class AtividadesController < ApplicationController
  def index
    @submetidas = Atividade.where(situacao: 'Em análise')
    @integralizadas = Atividade.where(situacao: 'Aprovada')
    @indeferidas = Atividade.where(situacao: 'Indeferida')
  end

  def show
    @atividade = Atividade.find(params[:id])
    render 'atividades/exibir-atividade'
  end

  def new
    @atividade = Atividade.new
    render 'atividades/cadastrar-atividade'
  end

  def create
    @atividade = Atividade.new(atividade_params)

    # Recebendo o tipo da atividade de extensão se esta for Curso ou Evento, caso contrário o campo permanece vazio
    if params[:atividade][:acao_extensao] == 'Curso'
      @atividade.tipo = params[:atividade][:tipo_curso]
    elsif params[:atividade][:acao_extensao] == 'Evento'
      @atividade.tipo = params[:atividade][:tipo_evento]
    else
      @atividade.tipo = nil
    end

    if @atividade.save
      # Se a atividade for salva com sucesso, redireciona para a página inicial
      redirect_to root_path, notice: 'Atividade cadastrada com sucesso!'
    else
      # Se houver erros de validação, renderiza novamente o formulário
      render 'atividades/cadastrar-atividade'
    end
  end

  # Strong parameters para permitir apenas os campos necessários
  def atividade_params
    params.require(:atividade).permit(:acao_extensao, :tipo, :horas, :anexo)
  end
end
