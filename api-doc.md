# GET http://localhost:8000/api/v1/person/{personId} 
Get a person with his professional experience 
 

 --- 
# GET http://localhost:8000/api/v1/persons 
Get all persons 
 

 --- 
# GET http://localhost:8000/api/v1/society/{societyId}/persons 
Get the list of persons who has worked in a society 
 

 --- 
# GET http://localhost:8000/api/v1/societies 
Get all societies 
 

 --- 
# POST http://localhost:8000/api/v1/person 
Create a person 
 
body : {"firstname":"string","last_name":"string","birth_date":"string format (y-m-d)"} 

 --- 
# POST http://localhost:8000/api/v1/professional-experience 
Add a professional experience to a person 
 
body : {"firstname":"string","last_name":"string","birth_date":"string format (y-m-d)"} 

 --- 
