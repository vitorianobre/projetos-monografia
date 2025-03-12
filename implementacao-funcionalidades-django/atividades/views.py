from django.shortcuts import render, get_object_or_404, redirect
from .models import Atividade

def lista_atividades(request):
    submetidas = Atividade.objects.filter(situacao='Em análise')
    integralizadas = Atividade.objects.filter(situacao='Integralizada')
    indeferidas = Atividade.objects.filter(situacao='Indeferida')

    context = {
        'submetidas': submetidas,
        'integralizadas': integralizadas,
        'indeferidas': indeferidas
    }
    
    return render(request, 'atividades/index.html', context)

def cadastrar_atividade(request):
    if request.method == "POST":
        
        return redirect("atividades:lista_atividades")

    return render(request, "atividades/form.html")

def exibir_atividade(request, id):
    atividade = get_object_or_404(Atividade, pk=id)
    return render(request, 'atividades/exibir-atividade.html', {'atividade': atividade})
