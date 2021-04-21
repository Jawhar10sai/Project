USE [RAMEX]
GO

/****** Object:  Table [dbo].[Agence_Compte]    Script Date: 28/12/2020 09:29:07 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Agence_Compte](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_compte] [int] NOT NULL,
	[agence_cod] [char](5) NOT NULL,
	[agence_lib] [varchar](64) NOT NULL,
 CONSTRAINT [PK_Compte_Agence] PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
