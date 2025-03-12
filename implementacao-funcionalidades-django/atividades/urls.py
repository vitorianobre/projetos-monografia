from django.urls import path
from . import views

app_name = 'atividades'

urlpatterns = [
    path('', views.lista_atividades, name='lista_atividades'),
    path('cadastrar/', views.cadastrar_atividade, name='cadastrar_atividade'),
    path('<int:id>/', views.exibir_atividade, name='exibir_atividade'),
]
