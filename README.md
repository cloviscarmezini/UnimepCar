# UnimepCar

Sistema simples desenvolvido durante o curso de Desenvolvimento Web de Sistemas de Informação, quando ainda estava começando a programar em PHP.

Este é um sistema voltado a mecânicas, empresas em gerais que trabalham com veículos.

O sistema foi desenvolvido em PHP, utilizando o padrão MVC. Não foi utilizado nenhum framework, pois, a idéia foi explorar
meus conhecimentos da época. O front-end também foi desenvolvido do zero, sem reaporveitar nenhum código, apenas utilizando bootstrap 4.

Módulos:

ADMINISTRADOR - Tela onde é possível gerenciar os funcionários da empresa, e usuários que acessam o sistema.

MANUTENÇÃO - Tela onde é iniciado o cadastro da manutenção do veículo. Depende da insersão de pelo menos 1 cliente e 1 veículo antes de
iniciar uma manutenção.

CLIENTE - Tela de gerenciamento dos clientes. (inserção, visualização, ediçao e exclusão). Pode-se cadastrar um cliente sem cadastrar um
veículo vinculado a ele.

VEÍCULO - Tela de gerenciamento dos veículos dos clientes. Caso um cliente não possua um carro cadastrado ainda, é possivel criar o veículo
e associar ao cliente. Também é possível adicionar um veículo a um cliente que já possui um veículo.

PEÇAS - Tela onde são cadastradas as peças que ficam em estoque na empresa. As mesmas são utilizadas no módulo de MANUTENÇÃO.


