<?php return unserialize('a:2:{s:8:"lifetime";i:0;s:4:"data";O:34:"Doctrine\\ORM\\Mapping\\ClassMetadata":13:{s:19:"associationMappings";a:2:{s:13:"codticketitem";a:15:{s:9:"fieldName";s:13:"codticketitem";s:8:"mappedBy";s:9:"codticket";s:12:"targetEntity";s:31:"App\\Models\\Entity\\tbTicketItens";s:7:"cascade";a:0:{}s:13:"orphanRemoval";b:0;s:5:"fetch";i:2;s:4:"type";i:4;s:10:"inversedBy";N;s:12:"isOwningSide";b:0;s:12:"sourceEntity";s:27:"App\\Models\\Entity\\tbTickets";s:15:"isCascadeRemove";b:0;s:16:"isCascadePersist";b:0;s:16:"isCascadeRefresh";b:0;s:14:"isCascadeMerge";b:0;s:15:"isCascadeDetach";b:0;}s:10:"codusuario";a:19:{s:9:"fieldName";s:10:"codusuario";s:11:"joinColumns";a:1:{i:0;a:6:{s:4:"name";s:13:"codusuario_id";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";N;s:16:"columnDefinition";N;s:20:"referencedColumnName";s:10:"codusuario";}}s:7:"cascade";a:0:{}s:10:"inversedBy";s:9:"codticket";s:12:"targetEntity";s:28:"App\\Models\\Entity\\tbUsuarios";s:5:"fetch";i:2;s:4:"type";i:2;s:8:"mappedBy";N;s:12:"isOwningSide";b:1;s:12:"sourceEntity";s:27:"App\\Models\\Entity\\tbTickets";s:15:"isCascadeRemove";b:0;s:16:"isCascadePersist";b:0;s:16:"isCascadeRefresh";b:0;s:14:"isCascadeMerge";b:0;s:15:"isCascadeDetach";b:0;s:24:"sourceToTargetKeyColumns";a:1:{s:13:"codusuario_id";s:10:"codusuario";}s:20:"joinColumnFieldNames";a:1:{s:13:"codusuario_id";s:13:"codusuario_id";}s:24:"targetToSourceKeyColumns";a:1:{s:10:"codusuario";s:13:"codusuario_id";}s:13:"orphanRemoval";b:0;}}s:11:"columnNames";a:17:{s:9:"codticket";s:9:"codticket";s:15:"coddepartamento";s:15:"coddepartamento";s:12:"codcategoria";s:12:"codcategoria";s:8:"codclass";s:8:"codclass";s:9:"codstatus";s:9:"codstatus";s:6:"titulo";s:6:"titulo";s:10:"prioridade";s:10:"prioridade";s:9:"avaliacao";s:9:"avaliacao";s:9:"bloqueado";s:9:"bloqueado";s:10:"dtabertura";s:10:"dtabertura";s:11:"dtalteracao";s:11:"dtalteracao";s:12:"dtfechamento";s:12:"dtfechamento";s:10:"codcliente";s:10:"codcliente";s:16:"dtleituracliente";s:16:"dtleituracliente";s:17:"dthrreenvioticket";s:17:"dthrreenvioticket";s:18:"dthrreenvioticket2";s:18:"dthrreenvioticket2";s:24:"concluidoautomaticamente";s:24:"concluidoautomaticamente";}s:13:"fieldMappings";a:17:{s:9:"codticket";a:9:{s:9:"fieldName";s:9:"codticket";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:0;s:9:"precision";i:0;s:2:"id";b:1;s:10:"columnName";s:9:"codticket";}s:15:"coddepartamento";a:8:{s:9:"fieldName";s:15:"coddepartamento";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:15:"coddepartamento";}s:12:"codcategoria";a:8:{s:9:"fieldName";s:12:"codcategoria";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:12:"codcategoria";}s:8:"codclass";a:8:{s:9:"fieldName";s:8:"codclass";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:8:"codclass";}s:9:"codstatus";a:8:{s:9:"fieldName";s:9:"codstatus";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:9:"codstatus";}s:6:"titulo";a:8:{s:9:"fieldName";s:6:"titulo";s:4:"type";s:6:"string";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:6:"titulo";}s:10:"prioridade";a:8:{s:9:"fieldName";s:10:"prioridade";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:10:"prioridade";}s:9:"avaliacao";a:8:{s:9:"fieldName";s:9:"avaliacao";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:9:"avaliacao";}s:9:"bloqueado";a:8:{s:9:"fieldName";s:9:"bloqueado";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:9:"bloqueado";}s:10:"dtabertura";a:8:{s:9:"fieldName";s:10:"dtabertura";s:4:"type";s:8:"datetime";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:10:"dtabertura";}s:11:"dtalteracao";a:8:{s:9:"fieldName";s:11:"dtalteracao";s:4:"type";s:8:"datetime";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:11:"dtalteracao";}s:12:"dtfechamento";a:8:{s:9:"fieldName";s:12:"dtfechamento";s:4:"type";s:8:"datetime";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:12:"dtfechamento";}s:10:"codcliente";a:8:{s:9:"fieldName";s:10:"codcliente";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:10:"codcliente";}s:16:"dtleituracliente";a:8:{s:9:"fieldName";s:16:"dtleituracliente";s:4:"type";s:8:"datetime";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:16:"dtleituracliente";}s:17:"dthrreenvioticket";a:8:{s:9:"fieldName";s:17:"dthrreenvioticket";s:4:"type";s:8:"datetime";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:17:"dthrreenvioticket";}s:18:"dthrreenvioticket2";a:8:{s:9:"fieldName";s:18:"dthrreenvioticket2";s:4:"type";s:8:"datetime";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:18:"dthrreenvioticket2";}s:24:"concluidoautomaticamente";a:8:{s:9:"fieldName";s:24:"concluidoautomaticamente";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:24:"concluidoautomaticamente";}}s:10:"fieldNames";a:17:{s:9:"codticket";s:9:"codticket";s:15:"coddepartamento";s:15:"coddepartamento";s:12:"codcategoria";s:12:"codcategoria";s:8:"codclass";s:8:"codclass";s:9:"codstatus";s:9:"codstatus";s:6:"titulo";s:6:"titulo";s:10:"prioridade";s:10:"prioridade";s:9:"avaliacao";s:9:"avaliacao";s:9:"bloqueado";s:9:"bloqueado";s:10:"dtabertura";s:10:"dtabertura";s:11:"dtalteracao";s:11:"dtalteracao";s:12:"dtfechamento";s:12:"dtfechamento";s:10:"codcliente";s:10:"codcliente";s:16:"dtleituracliente";s:16:"dtleituracliente";s:17:"dthrreenvioticket";s:17:"dthrreenvioticket";s:18:"dthrreenvioticket2";s:18:"dthrreenvioticket2";s:24:"concluidoautomaticamente";s:24:"concluidoautomaticamente";}s:15:"embeddedClasses";a:0:{}s:10:"identifier";a:1:{i:0;s:9:"codticket";}s:21:"isIdentifierComposite";b:0;s:4:"name";s:27:"App\\Models\\Entity\\tbTickets";s:9:"namespace";s:17:"App\\Models\\Entity";s:5:"table";a:1:{s:4:"name";s:9:"tbTickets";}s:14:"rootEntityName";s:27:"App\\Models\\Entity\\tbTickets";s:11:"idGenerator";O:33:"Doctrine\\ORM\\Id\\AssignedGenerator":0:{}s:25:"customRepositoryClassName";s:33:"App\\Models\\Repository\\RepTbTicket";}}');