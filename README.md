##Test Barcelona Tech City 
Ejecutar: docker-compose up --build
Con ello se lanzará un comando que esta en src/Infrastructure/Command. EL cual lanza 4 ascensores con 4 sequencias.

##Parte 3 (Optimización)
En el directorio src/Infrastructure/Resources/config/persistence teneis como haría yo el modelo de datos para la bbdd en el caso de que se utilizara multisequencias.


App\Domain\Elevator\Model\Elevator:
    type: entity
    table: elevator
    repositoryClass:  App\Infrastructure\Repository\ElevatorRepository
    id:
        id:
            type: string
            length: 38
            nullable: false

    fields:
        name:
            type: string
            length: 255
            nullable: false
        createdAt:
            type: datetime
            nullable: false
        updatedAt:
            type: datetime
            nullable: false
            
            
App\Domain\Elevator\Model\Floor:
    type: entity
    table: floor
    repositoryClass:  App\Infrastructure\Repository\FloorRepository
    id:
        id:
            type: string
            length: 38
            nullable: false

    fields:
        name:
            type: string
            length: 255
            nullable: false
        createdAt:
            type: datetime
            nullable: false
        updatedAt:
            type: datetime
            nullable: false            
            
            
App\Domain\Sequence\Model\Sequence:
    type: entity
    table: sequence
    repositoryClass:  App\Infrastructure\Repository\SequenceRepository
    id:
        id:
            type: string
            length: 38
            nullable: false

    fields:
        name:
            type: string
            length: 255
            nullable: false
        begin:
            type: integer
            length: 80
            nullable: false
        end:
            type: integer
            length: 80
            nullable: false
        interval:
            type: integer
            length: 80
            nullable: false
        createdAt:
            type: datetime
            nullable: false
        updatedAt:
            type: datetime
            nullable: false

    manyToOne:
        originFloor:
            targetEntity: App\Domain\Floor\Model\Floor
            joinColumn:
                name: origin_floor
                referencedColumnName: id
        destinyFloor:
            targetEntity: App\Domain\Floor\Model\Floor
            joinColumn:
                name: destiny_floor
                referencedColumnName: id
                
                
App\Domain\ElevatorSequence\Model\ElevatorSequence:
    type: entity
    table: elevator_sequence
    repositoryClass:  App\Infrastructure\Repository\ElevatorSequenceRepository
    id:
        id:
            type: string
            length: 38
            nullable: false
        createdAt:
            type: datetime
            nullable: false
        updatedAt:
            type: datetime
            nullable: false

    manyToOne:
        elevator:
            targetEntity: App\Domain\Elevator\Model\Elevator
            joinColumn:
                name: elevator_id
                referencedColumnName: id
        sequence:
            targetEntity: App\Domain\Sequence\Model\Sequence
            joinColumn:
                name: sequence_id
                referencedColumnName: id                            