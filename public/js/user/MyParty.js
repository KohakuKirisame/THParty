$(document).ready(function (){
	$("#navPartyOfMine").css("font-weight","bold");
	$("#partyTable").bootstrapTable({
		pagination: true,
		search: true,
		columns: [{
			field: 'id',
			title: '活动编号'
		}, {
			field: 'title',
			title: 'THP主题'
		}, {
			field: 'time',
			title: '活动时间'
		}],
		data: [{'id':1,'title':'buaa4th','time':'2023.4.16'}] //unfinished
	});
});
