const lokasiMap = {
  indralaya: "https://maps.google.com/maps?q=Universitas+Sriwijaya+Indralaya&output=embed",
  bukit: "https://maps.google.com/maps?q=Universitas+Sriwijaya+Kampus+Palembang+Bukit+Besar&output=embed"
};

document.querySelectorAll('.btn-lokasi').forEach(btn =>{
  btn.addEventListener('click', () => {
    document.getElementById('mapFrame').src = lokasiMap[btn.dataset.lokasi];

    document.querySelectorAll('.btn-lokasi').forEach(b => {
      b.classList.remove('bg-damri-navy', 'text-white');
      b.classList.add('bg-slate-50', 'text-slate-700');
    });
    btn.classList.add('bg-damri-navy', 'text-white');
    btn.classList.remove('bg-slate-50', 'text-slate-700');
  });
});