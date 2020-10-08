SELECT name, COUNT(name) as amount FROM (SELECT transactions.from_person_id as person FROM transactions  UNION ALL
                                         SELECT transactions.to_person_id as person FROM transactions ) as allpersons 
    inner join persons on allpersons.person=persons.id 
    inner join cities on persons.city_id = cities.id 
    group by name ORDER BY amount DESC LIMIT 1