from django.contrib import admin
from django.urls import path, include

urlpatterns = [
    path('tarefas/', include("tarefas.urls")),
    path('admin/', admin.site.urls),
]
