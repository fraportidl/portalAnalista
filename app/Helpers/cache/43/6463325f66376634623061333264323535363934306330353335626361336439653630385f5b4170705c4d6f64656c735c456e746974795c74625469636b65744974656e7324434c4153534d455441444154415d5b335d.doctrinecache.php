<?php return unserialize('a:2:{s:8:"lifetime";i:0;s:4:"data";O:34:"Doctrine\\ORM\\Mapping\\ClassMetadata":13:{s:19:"associationMappings";a:1:{s:9:"codticket";a:19:{s:9:"fieldName";s:9:"codticket";s:11:"joinColumns";a:1:{i:0;a:6:{s:4:"name";s:12:"codticket_id";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";N;s:16:"columnDefinition";N;s:20:"referencedColumnName";s:9:"codticket";}}s:7:"cascade";a:0:{}s:10:"inversedBy";s:13:"codticketitem";s:12:"targetEntity";s:27:"App\\Models\\Entity\\tbTickets";s:5:"fetch";i:2;s:4:"type";i:2;s:8:"mappedBy";N;s:12:"isOwningSide";b:1;s:12:"sourceEntity";s:31:"App\\Models\\Entity\\tbTicketItens";s:15:"isCascadeRemove";b:0;s:16:"isCascadePersist";b:0;s:16:"isCascadeRefresh";b:0;s:14:"isCascadeMerge";b:0;s:15:"isCascadeDetach";b:0;s:24:"sourceToTargetKeyColumns";a:1:{s:12:"codticket_id";s:9:"codticket";}s:20:"joinColumnFieldNames";a:1:{s:12:"codticket_id";s:12:"codticket_id";}s:24:"targetToSourceKeyColumns";a:1:{s:9:"codticket";s:12:"codticket_id";}s:13:"orphanRemoval";b:0;}}s:11:"columnNames";a:10:{s:13:"codticketitem";s:13:"codticketitem";s:7:"privado";s:7:"privado";s:6:"dtitem";s:6:"dtitem";s:10:"codusuario";s:10:"codusuario";s:12:"nomeoperador";s:12:"nomeoperador";s:21:"codigooriginalusuario";s:21:"codigooriginalusuario";s:11:"nomecliente";s:11:"nomecliente";s:9:"descricao";s:9:"descricao";s:7:"codform";s:7:"codform";s:10:"codcliente";s:10:"codcliente";}s:13:"fieldMappings";a:10:{s:13:"codticketitem";a:9:{s:9:"fieldName";s:13:"codticketitem";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:0;s:9:"precision";i:0;s:2:"id";b:1;s:10:"columnName";s:13:"codticketitem";}s:7:"privado";a:8:{s:9:"fieldName";s:7:"privado";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:0;s:9:"precision";i:0;s:10:"columnName";s:7:"privado";}s:6:"dtitem";a:8:{s:9:"fieldName";s:6:"dtitem";s:4:"type";s:8:"datetime";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:0;s:9:"precision";i:0;s:10:"columnName";s:6:"dtitem";}s:10:"codusuario";a:8:{s:9:"fieldName";s:10:"codusuario";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:0;s:9:"precision";i:0;s:10:"columnName";s:10:"codusuario";}s:12:"nomeoperador";a:8:{s:9:"fieldName";s:12:"nomeoperador";s:4:"type";s:6:"string";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:0;s:9:"precision";i:0;s:10:"columnName";s:12:"nomeoperador";}s:21:"codigooriginalusuario";a:8:{s:9:"fieldName";s:21:"codigooriginalusuario";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:21:"codigooriginalusuario";}s:11:"nomecliente";a:8:{s:9:"fieldName";s:11:"nomecliente";s:4:"type";s:6:"string";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:11:"nomecliente";}s:9:"descricao";a:8:{s:9:"fieldName";s:9:"descricao";s:4:"type";s:4:"text";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:9:"descricao";}s:7:"codform";a:8:{s:9:"fieldName";s:7:"codform";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:7:"codform";}s:10:"codcliente";a:8:{s:9:"fieldName";s:10:"codcliente";s:4:"type";s:7:"integer";s:5:"scale";i:0;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:1;s:9:"precision";i:0;s:10:"columnName";s:10:"codcliente";}}s:10:"fieldNames";a:10:{s:13:"codticketitem";s:13:"codticketitem";s:7:"privado";s:7:"privado";s:6:"dtitem";s:6:"dtitem";s:10:"codusuario";s:10:"codusuario";s:12:"nomeoperador";s:12:"nomeoperador";s:21:"codigooriginalusuario";s:21:"codigooriginalusuario";s:11:"nomecliente";s:11:"nomecliente";s:9:"descricao";s:9:"descricao";s:7:"codform";s:7:"codform";s:10:"codcliente";s:10:"codcliente";}s:15:"embeddedClasses";a:0:{}s:10:"identifier";a:1:{i:0;s:13:"codticketitem";}s:21:"isIdentifierComposite";b:0;s:4:"name";s:31:"App\\Models\\Entity\\tbTicketItens";s:9:"namespace";s:17:"App\\Models\\Entity";s:5:"table";a:1:{s:4:"name";s:13:"tbTicketItens";}s:14:"rootEntityName";s:31:"App\\Models\\Entity\\tbTicketItens";s:11:"idGenerator";O:33:"Doctrine\\ORM\\Id\\AssignedGenerator":0:{}s:25:"customRepositoryClassName";s:38:"App\\Models\\Repository\\RepTbTicketItens";}}');