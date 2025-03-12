from django.db import models

class Atividade(models.Model):
    ACAO_EXTENSAO_CHOICES = [
        ('Programa', 'Programa'),
        ('Projeto', 'Projeto'),
        ('Curso', 'Curso'),
        ('Evento', 'Evento'),
    ]

    TIPO_CURSO_CHOICES = [
        ('Formação inicial', 'Formação inicial'),
        ('Formação continuada', 'Formação continuada'),
    ]

    TIPO_EVENTO_CHOICES = [
        ('Congresso', 'Congresso'),
        ('Seminário', 'Seminário'),
        ('Encontro', 'Encontro'),
        ('Simpósio', 'Simpósio'),
    ]

    SITUACAO_CHOICES = [
        ('Em análise', 'Em análise'),
        ('Integralizada', 'Integralizada'),
        ('Indeferida', 'Indeferida'),
    ]

    acao_extensao = models.CharField(max_length=20, choices=ACAO_EXTENSAO_CHOICES)
    tipo_curso = models.CharField(max_length=30, choices=TIPO_CURSO_CHOICES, blank=True, null=True)
    tipo_evento = models.CharField(max_length=30, choices=TIPO_EVENTO_CHOICES, blank=True, null=True)
    horas = models.PositiveIntegerField()
    anexo = models.FileField(upload_to='anexos/', blank=True, null=True)
    data_submissao = models.DateField(auto_now_add=True)
    situacao = models.CharField(max_length=50, default="Em análise")

    def __str__(self):
        return f"{self.acao_extensao} - {self.horas}h"
