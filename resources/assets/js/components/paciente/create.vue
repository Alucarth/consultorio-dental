<script>
export default {
	data:()=>({
		birthdate:null,
	}),
	methods:{
		getAge(str_birthDate){
			if(str_birthDate){
				let [day, month, year] = str_birthDate.split("/");
				console.log('calculando ');
				if(!isNaN(day) && !isNaN(month) && !isNaN(year)){
					console.log('day;'+day);
					console.log('month;'+month);
					console.log('year;'+year);
					let today = new Date();
					let birthDate = new Date(year, month - 1, day)
					let age = today.getFullYear() - birthDate.getFullYear();
					let m = today.getMonth() - birthDate.getMonth();
					if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
					{
						age--;
					}
					console.log('es fecha:'+age);
					return age;
				}else{
					return 0;
				}
			
			}else{
				return 0;
			}
		}
	},
	computed:{
		age(){
			
			// return 0;
		}
	}

}
</script>
