
# API Criada para a Liberfly para Reserva de Salas

# URL's 
- api/agendamento/consulta/{data formato Y-m-d}
- api/agendamento/agendar
- api/agendamento/desmarcar/{id}


# Consulta
A Consulta será passado o dia em formato : Y-m-d. E será retornado todos os Campos relacionados a Agendamento de Sala

# Agendar
Para agendar será necessário os seguintes campos:
  - id_sala (int)
  - email (varchar(50)
  - dt_inicio (datetime (Y-m-d H:i)
  - dt_fim (datetime (Y-m-d H:i)
  - descricao (varchar(500)
  
  A Consulta só poderá ser feita, caso não tenha nenhum agendamento para a sala informada
  
 # Desmarcar
 Para desmarcar, basta informar o id do agendamento.
