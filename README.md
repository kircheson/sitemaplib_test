## Установка

**bash composer require kirill/site-map-generator**

### Доступные форматы

Библиотека поддерживает следующие форматы сайт-карт:

- XML
- JSON 
- CSV

Для использования других форматов измените параметр `$generator->generate()` на соответствующий тип ('json' или 'csv').

## Дополнительные функции

- Валидация входных данных
- Поддержка нескольких форматов вывода
- Автоматическое создание директории для выходного файла
