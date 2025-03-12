from django.shortcuts import render, redirect, get_object_or_404
from .models import Tarefa

def index (request):
    tarefa=Tarefa.objects.all()
    if request.POST:
        tarefa=request.POST.get('conteudo')
        tarefa=Tarefa(conteudo=tarefa)
        tarefa.save()
        return redirect('index')
    
    context={
        'tarefa':tarefa,
    }
    return render(request, 'tarefas\index.html', context)

def excluir_tarefa(request,id):
        tarefa=Tarefa.objects.get(id=id)
        tarefa.delete()
        return redirect('index')

def editar_tarefa(request, id):
    tarefa = get_object_or_404(Tarefa, id=id)
    
    if request.method == 'POST':
        conteudo = request.POST.get('conteudo')
        tarefa.conteudo = conteudo
        tarefa.save()
        return redirect('index')
    
    context = {
        'tarefa': tarefa,
    }
    return render(request, 'tarefas/editar.html', context)