USE [RAMEX]
GO

/****** Object:  Table [dbo].[Ramassage]    Script Date: 28/12/2020 10:58:28 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Ramassage](
	[num_ram] [numeric](19, 0) NOT NULL,
	[code_ram] [varchar](50) NULL,
	[date_prevue_ram] [varchar](50) NULL,
	[date_ram_reel] [varchar](50) NULL,
	[code_clt] [varchar](50) NULL,
	[etat_ram] [int] NULL,
	[matricule_ramasseur] [varchar](50) NULL,
	[date_prog_ram] [varchar](50) NULL,
	[nv_client_id] [int] NULL,
	[nom_client] [varchar](50) NULL,
	[nom_secteur] [varchar](50) NULL,
	[nom_ramasseur] [varchar](50) NULL,
	[heure_prevue_ram] [varchar](50) NULL,
	[heure_prog_ram] [varchar](50) NULL,
	[heure_reel_ram] [varchar](50) NULL,
	[nbr_expedition] [int] NULL,
	[nbr_colis] [int] NULL,
	[nom_agence] [varchar](50) NULL,
	[type_canal] [varchar](50) NULL,
	[nom_canal] [varchar](50) NULL,
	[deleted] [int] NULL,
	[adresse_ram] [varchar](300) NULL,
	[date_saisie_ram] [datetime] NULL,
	[nv_pres_id] [int] NULL,
	[nom_pres] [varchar](50) NULL,
	[code_pres] [varchar](50) NULL,
	[acces] [char](3) NULL,
	[colis] [int] NULL,
	[nature_march] [varchar](50) NULL,
	[mesure_type] [varchar](50) NULL,
	[mesure] [int] NULL,
	[motif_annulation] [varchar](300) NULL,
	[interloc_id] [numeric](18, 0) NULL,
	[relance] [int] NULL,
	[delai_affectation] [int] NULL,
	[retard] [int] NULL,
	[source_id] [int] NULL,
 CONSTRAINT [PK_Ramassage] PRIMARY KEY CLUSTERED
(
	[num_ram] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
 CONSTRAINT [IX_Ramassage] UNIQUE NONCLUSTERED
(
	[code_ram] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Ramassage]  WITH CHECK ADD  CONSTRAINT [FK_Ramassage_Nouveau_Client] FOREIGN KEY([nv_client_id])
REFERENCES [dbo].[Nouveau_Client] ([id_client])
ON UPDATE CASCADE
GO

ALTER TABLE [dbo].[Ramassage] CHECK CONSTRAINT [FK_Ramassage_Nouveau_Client]
GO
