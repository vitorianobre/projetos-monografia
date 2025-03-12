# Generated by Django 4.2 on 2025-02-13 11:18

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('atividades', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='atividade',
            name='data_avaliacao',
        ),
        migrations.AddField(
            model_name='atividade',
            name='anexo',
            field=models.FileField(blank=True, null=True, upload_to='anexos/'),
        ),
        migrations.AlterField(
            model_name='atividade',
            name='acao_extensao',
            field=models.CharField(choices=[('Programa', 'Programa'), ('Projeto', 'Projeto'), ('Curso', 'Curso'), ('Evento', 'Evento')], max_length=20),
        ),
        migrations.AlterField(
            model_name='atividade',
            name='data_submissao',
            field=models.DateField(auto_now_add=True),
        ),
        migrations.AlterField(
            model_name='atividade',
            name='situacao',
            field=models.CharField(choices=[('Em análise', 'Em análise'), ('Aprovada', 'Aprovada'), ('Indeferida', 'Indeferida')], default='Em análise', max_length=20),
        ),
        migrations.AlterField(
            model_name='atividade',
            name='tipo',
            field=models.CharField(blank=True, choices=[('Formação inicial', 'Formação inicial'), ('Formação continuada', 'Formação continuada'), ('Congresso', 'Congresso'), ('Seminário', 'Seminário'), ('Encontro', 'Encontro'), ('Simpósio', 'Simpósio')], max_length=20, null=True),
        ),
    ]
