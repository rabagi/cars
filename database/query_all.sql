select makes.name as makes, make_years.year,
			models.name as model
From models
join make_years On models.makeyear_id = make_years.id
join makes on make_years.make_id = makes.id
order by makes.name, make_years.year, models.name; 