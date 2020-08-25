### Criando model

```bash
# apenas o model
dc_exec app php make:model MODEL_NAME

# model completo (migration, seeder, factory and resourcer para as rotas)
dc_exec app php make:model MODEL_NAME -a

# model com migration, seeder e factory
dc_exec app php make:model MODEL_NAME -msf
```