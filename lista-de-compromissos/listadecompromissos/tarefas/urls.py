from django.urls import path
from . import views

urlpatterns = [
    path("", views.index, name="index"),
    path('delete/<int:id>/',views.excluir_tarefa,name='delete'),
    path('editar/<int:id>/', views.editar_tarefa, name='editar_tarefa'),
]