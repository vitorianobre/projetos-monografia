from django.contrib import admin
from .models import Atividade

class AtividadeAdmin(admin.ModelAdmin):
    list_display = ('acao_extensao', 'get_tipo', 'horas', 'data_submissao')
    list_filter = ('acao_extensao', 'horas', 'data_submissao')

    def get_tipo(self, obj):
        if obj.acao_extensao == "Curso":
            return obj.tipo_curso or "-"
        elif obj.acao_extensao == "Evento":
            return obj.tipo_evento or "-"
        return "-"

    get_tipo.short_description = "Tipo"

admin.site.register(Atividade, AtividadeAdmin)