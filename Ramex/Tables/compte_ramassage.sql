USE [RAMEX]
GO

/****** Object:  Table [dbo].[Compte_Ramassage]    Script Date: 28/12/2020 09:31:13 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Compte_Ramassage](
	[id_compte] [int] NOT NULL,
	[num_ram] [numeric](19, 0) NOT NULL,
	[etape] [char](1) NOT NULL,
	[comment] [varchar](300) NULL,
	[date_saisie] [datetime] NULL,
	[camion] [varchar](50) NULL,
	[hayon] [char](3) NULL,
	[nbr_relance] [int] NULL,
	[motif] [int] NULL,
 CONSTRAINT [PK_Compte_Ramassage] PRIMARY KEY CLUSTERED
(
	[id_compte] ASC,
	[num_ram] ASC,
	[etape] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Compte_Ramassage]  WITH CHECK ADD  CONSTRAINT [FK_Compte_Ramassage_Compte] FOREIGN KEY([id_compte])
REFERENCES [dbo].[Compte] ([id_compte])
ON UPDATE CASCADE
GO

ALTER TABLE [dbo].[Compte_Ramassage] CHECK CONSTRAINT [FK_Compte_Ramassage_Compte]
GO

ALTER TABLE [dbo].[Compte_Ramassage]  WITH CHECK ADD  CONSTRAINT [FK_Compte_Ramassage_Ramassage] FOREIGN KEY([num_ram])
REFERENCES [dbo].[Ramassage] ([num_ram])
ON UPDATE CASCADE
GO

ALTER TABLE [dbo].[Compte_Ramassage] CHECK CONSTRAINT [FK_Compte_Ramassage_Ramassage]
GO
