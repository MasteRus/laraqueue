<?php

class S_q_servicesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('s_q_services')->truncate();
                
                $s_q_services0=array(
                    array(
                        //'id' =>1,
                        'name' => 'Подача документов',
                        'description'=> 'Подача документов',
                        'priority'=> 1,
                        //'parent_id'=> '',
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Выдача документов',
                        'description'=> 'Выдача документов',
                        'priority'=> 1,
                        //'parent_id'=> '',
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    )
                );
                
                $s_q_services1=array(
                    array(
                        //'id' =>3,
                        'name' => 'Заявление на выдачу сведений АИС ОГД',
                        'description'=> 'Заявление на выдачу сведений АИС ОГД',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        //'id' =>4,
                        'name' => 'Согласование проектной документации',
                        'description'=> 'Согласование проектной документации',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        //'id' =>5,
                        'name' => 'Разрешения на строительство, перевод, перепланировку и ввод в эксплуатацию; освидетельствование мат. капитала',
                        'description'=> 'Разрешения на строительство, перевод, перепланировку и ввод в эксплуатацию; освидетельствование мат. капитала',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        //'id' =>6,
                        'name' => 'Утверждение и выдача схемы расположения земельного участка на кад плане или карте соответствующей территории',
                        'description'=> 'Утверждение и выдача схемы расположения земельного участка на кад плане или карте соответствующей территории',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),

                    array(
                        //'id' =>7,
                        'name' => 'Утверждение и выдача градплана земельного участка',
                        'description'=> 'Утверждение и выдача градплана земельного участка',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),                    
                    array(
                        //'id' =>8,
                        'name' => 'Проведение публичных слушаний',
                        'description'=> 'Проведение публичных слушаний',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),  

                    array(
                        //'id' =>9,
                        'name' => 'Получение координат, планировочных ограничений, разрешений',
                        'description'=> 'Получение координат, планировочных ограничений, разрешений',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),                      
                    
                    array(
                        //'id' =>10,
                        'name' => 'Прием обращений, заявлений, запросов организаций',
                        'description'=> 'Прием обращений, заявлений, запросов организаций',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),                                          
                    array(
                        //'id' =>11,
                        'name' => 'Подготовка техзадания на инженерное обеспечение объекта',
                        'description'=> 'Подготовка техзадания на инженерное обеспечение объекта',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    )
                    );
                
                $s_q_services1_1=array(
                    array(
                        'name' => 'Сведения о соответствии град. нормам и правилам самовольно возведенных строений',
                        'description'=> 'Сведения о соответствии град. нормам и правилам самовольно возведенных строений',
                        'priority'=> 1,
                        'parent_id'=> 3,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Присвоение адресов',
                        'description'=> 'Присвоение адресов',
                        'priority'=> 1,
                        'parent_id'=> 3,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Копии документов',
                        'description'=> 'Копии документов',
                        'priority'=> 1,
                        'parent_id'=> 3,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ));
                $s_q_services1_2=array(
                    array(
                        'name' => 'Проект инженерного обеспечения',
                        'description'=> 'Проект инженерного обеспечения',
                        'priority'=> 1,
                        'parent_id'=> 4,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Проект благоустройства и озеленения',
                        'description'=> 'Проект благоустройства и озеленения',
                        'priority'=> 1,
                        'parent_id'=> 4,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Архитектурное решение',
                        'description'=> 'Архитектурное решение',
                        'priority'=> 1,
                        'parent_id'=> 4,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    
                    array(
                        'name' => 'Проект планировки',
                        'description'=> 'Проект планировки',
                        'priority'=> 1,
                        'parent_id'=> 4,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    
                    array(
                        'name' => 'Проект Межевания',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 4,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    )
                    
                    );

                $s_q_services1_4=array(
                    array(
                        'name' => 'Разрешение на строительство, на ввод в эксплуатацию ИЖС',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 5,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Разрешение на строительство, на ввод в эксплуатацию ОКС',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 5,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Перевод жилых помещений в нежилые и нежилых в жилые',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 5,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    
                    array(
                        'name' => 'Перепланировка и (или) переустройство жилых помещений',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 5,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    
                    array(
                        'name' => 'Акт освидетельствования маткапитала',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 5,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    )
                    
                    );                

                
                $s_q_services1_6=array(
                    array(
                        'name' => 'Публичные слушания на предоставление разрешения на условно разрешенный вид использования з/у',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 8,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Публичные слушания на предоставление отклонение от предельных параметров разрешенного строительства',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 8,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    )
                    
                    );    
                
                $s_q_services1_7=array(
                    array(
                        'name' => 'Пунктов\\высот геодезической сети, сети сгущения (съемочной сети)',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 9,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Красных линий, линий застройки, других линий градостроительного проектирования',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 9,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    )
                    
                    ); 
                
                $s_q_services1_1_1=array(
                    array(
                        'name' => 'Индивидуальный жилой дом',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 12,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Индивидуальный капитальный гараж',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 12,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Строение',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 12,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ));

                $s_q_services1_1_2=array(
                    array(
                        'name' => 'Земельный участок, индивидуальный жилой дом',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 13,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Отдельно стоящее здание, сооружение',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 13,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Помещение, квартира, капитальный гараж',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 13,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ));
                
                $s_q_services1_1_3=array(
                    array(
                        'name' => 'Выкопировка',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 14,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Документы из архива',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 14,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ));                
                
                
                $s_q_services1_4_1=array(
                    array(
                        'name' => 'Физическое лицо',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 20,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Юридическое лицо',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 20,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),

                    array(
                        'name' => 'Физическое лицо',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 21,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Юридическое лицо',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 21,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),

                    array(
                        'name' => 'Физическое лицо',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 22,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Юридическое лицо',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 22,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),

                    array(
                        'name' => 'Физическое лицо',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 23,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Юридическое лицо',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 23,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    )
                    
                    
                    );
                
                $s_q_servicesCentrGZ0=array(
                    array(
                        //'id' => 45
                        'name' => 'Выполнение инженерно-геодезических, проектно-планировочных, кадастровых работ',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 1,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ));
                $s_q_servicesCentrGZ1=array(
                    array(
                        //'id' => 46
                        'name' => 'Проектные работы',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 45,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        //'id' => 47
                        'name' => 'Кадастровые работы',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 45,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Топографическая съемка',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 45,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Разбивка земельных участков',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 45,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ));
                
                $s_q_servicesCentrGZ2=array(
                    array(
                        'name' => 'Проектные работы',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 46,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Кадастровые работы',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 46,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Топографическая съемка',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 46,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ));

                $s_q_servicesCentrGZ3=array(
                    array(
                        'name' => 'Проект планировки, проект меживания территории',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 47,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Проект благоустройства, парковки, индивидуального жилого дома и т.д.',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 47,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Чертеж градостроительного плана земельного участка',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 47,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Схема расположения земельного участка на кадастровом плане(карте) территории',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 47,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    ),
                    array(
                        'name' => 'Обоснование размера и схема планировочной организации земельного участка',
                        'description'=> '',
                        'priority'=> 1,
                        'parent_id'=> 47,
                        'enabled' => 1,
                        'display'=> 1,
                        'inet'=> 1,
                        'deleted'=> '',
                        'created_at'=> new DateTime,
                        'updated_at'=> new DateTime
                    )
                    );                
                
		// Uncomment the below to run the seeder
		DB::table('s_q_services')->insert($s_q_services0);
                DB::table('s_q_services')->insert($s_q_services1);
                DB::table('s_q_services')->insert($s_q_services1_1);
                DB::table('s_q_services')->insert($s_q_services1_2);
                DB::table('s_q_services')->insert($s_q_services1_4);
                DB::table('s_q_services')->insert($s_q_services1_6);
                DB::table('s_q_services')->insert($s_q_services1_7);
                
                DB::table('s_q_services')->insert($s_q_services1_1_1);
                DB::table('s_q_services')->insert($s_q_services1_1_2);
                DB::table('s_q_services')->insert($s_q_services1_1_3);
                
                DB::table('s_q_services')->insert($s_q_services1_4_1);
                
                DB::table('s_q_services')->insert($s_q_servicesCentrGZ0);
                DB::table('s_q_services')->insert($s_q_servicesCentrGZ1);
                DB::table('s_q_services')->insert($s_q_servicesCentrGZ2);
                DB::table('s_q_services')->insert($s_q_servicesCentrGZ3);
                
                
	}

}
